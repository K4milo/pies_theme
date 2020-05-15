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
        const formWrapper = this.wrapper;
        const loader = `<div class="form--loader"><span>Loading..</span></div>`;
        formWrapper.innerHTML = loader; 

        if (this.file.files[0]) {
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

                if(data) {
                    resultsDiv.innerHTML = successHTML;
                    formWrapper.innerHTML = ''; 
                }
                data ? resultsDiv.innerHTML = successHTML : 'No se pudo añadir el post';
            })
            .catch(e => console.log('error', e));
    }
}

export {
    PostQuestions
}