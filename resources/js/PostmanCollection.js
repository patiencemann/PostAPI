export default class PostmanCollection {
    /**
     * Load a collection to memory from a JSON file on disk (say, sample-collection.json)
     *
     * @param {string} path
     */
    make(path) {
        this.readFile(path);
        // var fs = require('fs');
        // var Collection = require('postman-collection').Collection;
        // return new Collection(JSON.parse(fs.readFileSync(path).toString()));
    }

    readFile(file) {
        let reader = new FileReader();

        reader.onload = e => {
          console.log(e.target.result);
          let json = JSON.parse(e.target.result);
          console.log(json);
        };

        reader.readAsText(file);
    }

    async getTheFile() {
        const pickerOpts = {
          types: [
            {
              description: "Images",
              accept: {
                "image/*": [".png", ".gif", ".jpeg", ".jpg"],
              },
            },
          ],
          excludeAcceptAllOption: true,
          multiple: false,
        };

        // open file picker
        const [fileHandle] = await window.showOpenFilePicker(pickerOpts);
        // get file contents
        const fileData = await fileHandle.getFile();
        return fileData;
      }
}
