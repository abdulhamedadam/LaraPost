
@props(['post'=>$post])
<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <div class="mb-4">
        <a href="{{ route('user.posts',$post->user) }}" class="font-bold mr-4">{{ $post->user->name }}</a> <span class="text-gray-600-sm">{{ $post->created_at->diffForHumans() }}</span>
        <p class="mb-2">{{ $post->body }}</p>


        <div class="d">
         @can('delete',$post)
         <form action="/posts/{{ $post->id }}/delete_posts" method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="text-blue-500">Delete</button>
         </form>
         @endcan
        </div>

        <div class="flex items-center">


         @auth


         @if (!$post->likedBy(auth()->user()))

         <form method="POST" action="/post/{{ $post->id }}/likes"  class="mr-3">
             @csrf

             <button type="submit" class="text-blue-500" ><i class="fa fa-thumbs-up"></i></button>
         </form>

         @else
         <form method="POST" action="/post/{{ $post->id }}/delete_likes"  class="mx-3">
             @csrf
            @method('DELETE')
             <button type="submit"><i class="fa fa-thumbs-down"></i></button>
         </form>

         @endif
         @endauth

         <span>{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count()) }}</span>
        </div>
     </div>
</div>
