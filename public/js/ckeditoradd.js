
function loadCKEditor(id,idInput) {

  ClassicEditor
    .create(document.querySelector('#'+id))
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
