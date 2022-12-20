<html>
    <title>App</title>
    <body>

        <a href="{{ route('add')}}"><button>Tambbah Blog</button></a>

        <table border="1">
            <thead>
                <tr>
                    <th>foto</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>action</th>
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
                    url: "http://localhost:8000/api/bloges",
                    method: "GET",
                    dataType: "json",
                    success: function (response) {
                        const data = response.data
                        var htmlTbody = "";
                        for (var blogs of data) {
                            htmlTbody += `<tr>
                                            <td><img src="${blogs.image}" style="width: 100px" alt="Foto blog post"></td>
                                            <td>${blogs.title}</td>
                                            <td>${blogs.writer}</td>
                                            <td>
                                                <a href="http://localhost:8000/bloges/edit/${blogs.id}">Update</a>
                                                <button onclick="deleted(${blogs.id})">Delete</button>
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
                        url: `http://localhost:8000/api/bloges/delete/${id}`,
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