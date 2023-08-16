<?php

namespace App\Http\Controllers\Activiy;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Tables\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\ExistingFile;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.activity.main', [
            'posts' => Posts::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.activity.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $data = $request->file('image')->store('public/image');
            $filename = pathinfo($data, PATHINFO_FILENAME) . '.' . $ext;
        }

        $post = new Post();

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $filename ?? '';

        $post->save();

        Toast::message('Berhasil Menambahkan Data Aktivitas')->autoDismiss(5);

        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Post::with('user')->findOrFail($id);
        return view(
            'pages.activity.show',
            [
                'data' => $data
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        // $image = ExistingFile::fromDisk('public')->get("$post->image");

        return view('pages.activity.edit', [
            'post' => $post,
            // 'image' => $image,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $activity = Post::findOrFail($id);

        // Update judul dan konten aktivitas
        $activity->title = $request->input('title');
        $activity->body = $request->input('body');

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Menghapus gambar lama (jika ada)
            if ($activity->image) {
                File::delete(public_path('storage/image/' . $activity->image));
            }

            // Upload dan menyimpan gambar baru
            $ext = $request->file('image')->getClientOriginalExtension();
            $data = $request->file('image')->store('public/image');
            $filename = pathinfo($data, PATHINFO_FILENAME) . '.' . $ext;

            $activity->image = $filename;
        } else {
            // Jika tidak ada file gambar baru, tetapi ada gambar lama yang dipilih
            if ($request->image_existing) {
                $activity->image = $request->image_existing;
            }
        }

        $activity->save();

        Toast::message('Berhasil Mengubah Data Aktivitas')->autoDismiss(5);

        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
