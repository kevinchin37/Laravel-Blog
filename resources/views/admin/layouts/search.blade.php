<div class="border border-secondary p-3 mb-3">
    <form action="/admin/search" type="POST">
        @csrf
        <div class="form-group">
            <label for="search-title">Search Post</label>
            <input type="text" class="form-control" id="search-title" name="title" placeholder="Post Title"/>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="search-author">Author</label>
                    <select class="custom-select" id="search-author" name="author">
                        <option value="none" selected disabled hidden>Select Author</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="search-category">Category</label>
                    <select class="custom-select" id="search-category" name="category">
                        <option value="none" selected disabled hidden>Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

