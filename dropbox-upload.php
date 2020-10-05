<!doctype html>
<html>

<head>
  <title>Dropbox JavaScript SDK</title>

  <!--<script src="/__build__/Dropbox-sdk.min.js"></script>
  -->
</head>

<body>
  <!-- Example layout boilerplate -->
  <header class="page-header">
    <div class="container">
      <nav>

        <h1>
          DROPBOX FILE UPLOAD
        </h1>


    </div>
  </header>

  <!-- Example description and UI -->
  <section class="container main">
    <p>Choose a name for the file you are uploading in the namespace provided:</p>

    <form>

      <input type="file" id="file-upload" />
      <input type="text" id="file-name" />
      <button type="submit" onclick="uploadFile">Submit</button>
    </form>

    <!-- A place to show the status of the upload -->
    <h2 id="results"></h2>

  </section>

  <script>

    File file = new File() document.getElementById("file-upload");
    var xhr = new XMLHttpRequest();

    xhr.upload.onprogress = function (evt) {
      var percentComplete = parseInt(100.0 * evt.loaded / evt.total);
      // Upload in progress. Do something here with the percent complete.
    };

    xhr.onload = function () {
      if (xhr.status === 200) {
        var fileInfo = JSON.parse(xhr.response);
        // Upload succeeded. Do something here with the file info.
      }
      else {
        var errorMessage = xhr.response || 'Unable to upload file';
        // Upload failed. Do something here with the error.
      }
    };

    xhr.open('POST', 'https://content.dropboxapi.com/2/files/upload');
    xhr.setRequestHeader('Authorization', 'Bearer ' + "S07kFRNwndkAAAAAAAAAAfcJIzWpX7N0ovOu7Uruduu0VsoshEIm5kMhlLR-7KyO");
    xhr.setRequestHeader('Content-Type', 'application/octet-stream');
    xhr.setRequestHeader('Dropbox-API-Arg', JSON.stringify({
      path: '/' + "" + document.getElementById("file-name"),
      mode: 'add',
      autorename: true,
      mute: false
    }));

    xhr.send(file);

  </script>
</body>

</html>