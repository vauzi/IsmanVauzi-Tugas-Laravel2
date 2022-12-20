<!DOCTYPE html>
<html lang="en">
<head>
    <title>App</title>
</head>
<body>
    <form id="saveProduct" enctype="multipart/form-data">
        <div>
            <label for="name">Nama Product</label>
            <input type="text" name="name" id="name" placeholder="Nama product" />
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image"/>
        </div>
        <div>
            <label for="stock">Stok</label>
            <input type="number" name="stock" id="stock" placeholder="stok" />
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" placeholder="Harga" />
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btnsave">
            Save changes
        </button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script>
        const id = {{ $id }};
        const data = [];
        $.ajax({
                url: `http://localhost:8000/api/products/show/${id}`,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    data.push(response.data)
                    $('#name').val(data[0].name);
                    $('#stock').val(data[0].stock);
                    $('#price').val(data[0].price);
                    $('#description').val(data[0].description);
                }
            });
        $(document).ready(function (e) {
            $("#saveProduct").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: `http://localhost:8000/api/products/update/${id}`,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(res){
                        window.location.href = "http://localhost:8000/frontend/product";
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