<ul class="media-list">
@foreach ($miyuposts as $miyupost)
    <?php $user = $miyupost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $miyupost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($miyupost->content)) !!}</p>
            </div>
            
            <div>
                
                 @if (Auth::id() == $miyupost->user_id)
                    {!! Form::open(['route' => ['miyuposts.destroy', $miyupost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        
    </li>
@endforeach
</ul>
{!! $miyuposts->render() !!}