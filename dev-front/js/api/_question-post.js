import {
    serialize
} from '../utils';

class PostQuestions {
    constructor(wrapper, resultWrapper, markupSuccess, fileInput) {
        this.wrapper = wrapper;
        this.resultsDOM = resultWrapper;
        this.resultMarkup = markupSuccess;
        this.file = fileInput;
        this.fetchResponse();
    }

    fetchResponse() {
        let serializedFrm = new FormData(this.wrapper);
        const ajaxUrl = this.wrapper.getAttribute("action");
        const resultsDiv = this.resultsDOM;
        const successHTML = this.resultMarkup;

        if (this.file.files[0]) {
            console.log(this.file.files[0]);
            serializedFrm.append("file", this.file.files[0]);
            serializedFrm.append('name', 'question-thumb');
            serializedFrm.append('description', 'Featured image for question');
        }

        const paramsObj = {
            method: 'POST',
            credentials: 'same-origin',
            body: serializedFrm
        }

        fetch(ajaxUrl, paramsObj)
            .then(response => response.text())
            .then(data => {
                data ? resultsDiv.innerHTML = successHTML : 'No se pudo añadir el post';
            })
            .catch(e => console.log('error', e));
    }
}

export {
    PostQuestions
}