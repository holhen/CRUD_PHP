@if(count($books) > 0)
    @foreach($books as $book)
        <div class="row">
            <div class="col id">{{$book->id}}</div>
            <div class="col author">{{$book->author}}</div>
            <div class="col title">{{$book->title}}</div>
            <div class="col isbn">{{$book->isbn}}</div>
            <div class="col buttons">
                <button class='btn btn-info edit'>Edit</button>
                <button class='btn btn-danger delete'>Delete</button>
            </div>
        </div>
    @endforeach
@endif