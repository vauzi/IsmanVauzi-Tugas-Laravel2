<html>
    <title>App</title>
    <body>
        <div style="display: flex; margin-top: 3rem;">
            <a href="{{ route('frontend.createProduct')}}" style="margin-right: 20rem;"><button>Tambbah Product</button></a>
            <div>
                <a href="{{ route('/') }}">Blog</a>
            </div>
        </div>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>product</th>
                    <th>image</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Desktipsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="daftar-blog">

            </tbody>
        </table>
        <div class="ml-5"></div>
        <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            getData();
            function getData() {
                $.ajax({
                    url: "http://localhost:8000/api/products/list",
                    method: "GET",
                    dataType: "json",
                    success: function (response) {
                        const data = response.data
                        var htmlTbody = "";
                        for (var product of data) {
                            htmlTbody += `<tr>
                                            <td>${product.name}</td>
                                            <td><img src="{{ asset('${product.path_image}')}}" style="width: 100px" alt="Foto blog post"></td>
                                            <td>${product.stock}</td>
                                            <td>${product.price}</td>
                                            <td>${product.description}</td>
                                            <td>
                                                <a href="http://localhost:8000/frontend/product/update/${product.id}">Update</a>
                                                <button onclick="deleted(${product.id})">Delete</button>
                                            </td>
                                        </tr>`
                        }
                        var html = $.parseHTML(htmlTbody);
                        $("#daftar-blog").html(html);
                    }
                });
            }
            function deleted(id) {
                if (confirm("Apakah anda yakin ingin menghapus data?")) {
                    $.ajax({
                        url: `http://localhost:8000/api/products/delete/${id}`,
                        method: "POST",
                        dataType: "json",
                        success: function (response) {
                            const data = response.data
                            getData();
                        }
                    });
                }
            }
        </script>
    </body>
</html>