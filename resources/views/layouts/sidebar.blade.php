<div class="panel panel-default">
    <div class="panel-heading">Category</div>
     <div class="panel-body">
        @foreach($categories as $category)
            <a href="{{ $category->id }}">{{ $category->name }}</a>
        @endforeach
    </div>
</div>