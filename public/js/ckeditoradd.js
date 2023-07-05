
function loadCKEditor(id,idInput) {

  ClassicEditor
    .create(document.querySelector('#'+id),{


      toolbar: {
        items: [
            'uploadImage',
            'browseFiles',
            // Other toolbar items...
        ],
      },

      icons: {
          uploadImage: '<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h520q24 0 42 18t18 42v680q0 24-18 42t-42 18H220Zm0-60h520v-680h-60v266l-97-56-97 56v-266H220v680Zm64-97h397L553-408 448-272l-70-88-94 123Zm-64 97v-680 680Zm266-414 97-56 97 56-97-56-97 56Z"/></svg>', // SVG path for upload image icon
          browseFiles: '<svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h520q24 0 42 18t18 42v680q0 24-18 42t-42 18H220Zm0-60h520v-680h-60v266l-97-56-97 56v-266H220v680Zm64-97h397L553-408 448-272l-70-88-94 123Zm-64 97v-680 680Zm266-414 97-56 97 56-97-56-97 56Z"/></svg>', // SVG path for browse files icon
          // Other icon mappings...
      },

      filebrowserUploadUrl: '/upload.php',
      filebrowserBrowseUrl: '/browse.php',
    })
    .then((editor) => {
      // console.log(editor);
      let icerik = document.getElementById(idInput).value

      if (icerik.length > 0) {
        editor.setData(icerik)
      }

      editor.model.document.on('change:data', (evt, data) => {

        console.log(editor.getData())
        document.getElementById(idInput).value = editor.getData()
        console.log(document.getElementById(idInput))
      })
    })
    .catch((error) => {
      console.error(error)
    })









}
