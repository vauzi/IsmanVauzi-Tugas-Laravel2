<html>
    <title>App</title>
    <body>

        <a href="{{ route('add')}}"><button>Tambbah Blog</button></a>

        <table>
            <thead>
                <tr border = "1">
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
            $.ajax({
                url: "http://localhost:8000/api/bloges",
                method: "GET",
                dataType: "json",
                success: function (response) {
                    const data = response.data
                    var htmlTbody = "";
                    for (var blogs of data) {
                        htmlTbody += `<tr>
                                        <td>${blogs.title}</td>
                                        <td>${blogs.writer}</td>
                                        <td>
                                            <a href="http://localhost:8000/add">Update</a>
                                            <a href="http://localhost:8000/api/bloges">Delete</a>
                                        </td>
                                    </tr>`
                    }
                    var html = $.parseHTML(htmlTbody);
                    $("#daftar-blog").append(html);
                }
            });
        </script>
    </body>
</html>