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
        $(document).ready(function (e) {
            $("#saveProduct").on('submit',(function(e) {
                var name = $('#name').val();
                var stock = $('#stock').val();
                var harga = $('#price').val();
                var deskripsi = $('#description').val();
                var image = $('#image').val();
                if(name == '') alert("Nama produk harus di isi");
                if(image == '') alert("Foto produk harus di isi");
                if(stock == '') alert("Stok produk harus di isi");
                if(harga == '') alert("Harga produk harus di isi");
                if(deskripsi == '') alert("Deskripdi produk harus di isi");
                e.preventDefault();
                // $.ajax({
                //     url: "http://localhost:8000/api/products/create",
                //     method: "POST",
                //     data: new FormData(this),
                //     contentType: false,
                //     cache: false,
                //     processData:false,
                //     success: function(res){
                //         window.location.href = "http://localhost:8000/frontend/product";
                //         console.log(res);
                //     },
                //     error: function(err){
                //         console.log(err);
                //     }        
                // });
            }));
        });
    </script>
</body>
</html>