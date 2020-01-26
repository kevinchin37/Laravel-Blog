<div class="border border-secondary p-3 mb-3">
    <form action="/admin/search" type="POST">
        <div class="form-group">
            <label for="search-title">Search Post</label>
            <input type="text" class="form-control" id="search-title" name="title" placeholder="Post Title"/>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="search-author">Author</label>
                    <input type="text" class="form-control" id="search-author" name="author" placeholder="Author Name"/>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

