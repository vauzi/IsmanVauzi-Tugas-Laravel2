<!DOCTYPE html>
<html lang="en">
<head>
    <title>App</title>
</head>
<body>
    <form id="saveBlog" enctype="multipart/form-data">
        <div>
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" placeholder="Judul" />
        </div>
        <div>
            <label for="writer">Pengarang</label>
            <input type="text" name="writer" id="writer" placeholder="Judul" />
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" placeholder="Judul" />
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btnsave">
            Save change
        </button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script>
        const id = {{ $id }};
        const data = [];
        $.ajax({
                url: `http://localhost:8000/api/bloges/${id}`,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    data.push(response.data)
                    $('#title').val(data[0].title);
                    $('#writer').val(data[0].writer);
                    $('#content').val(data[0].content);
                }
            });
        $(document).ready(function (e) {
            $("#saveBlog").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: `http://localhost:8000/api/bloges/${id}`,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(res){
                        window.location.href = "http://localhost:8000";
                        console.log(res.data);
                    },
                    error: function(err){
                        console.log(err);
                    }        
                });
            }));
        });
    </script>
</body>
</html>