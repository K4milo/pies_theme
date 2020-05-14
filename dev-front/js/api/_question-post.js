import { serialize } from '../utils';

class PostQuestions {
    constructor(wrapper, resultWrapper, markupSuccess,fileInput) {
        this.wrapper = wrapper;
        this.resultsDOM = resultWrapper;
        this.resultMarkup = markupSuccess;
        this.file = fileInput;
        this.fetchResponse();
    }

    fetchResponse() {
        let serializedFrm = serialize(this.wrapper);
        const ajaxUrl = this.wrapper.getAttribute("action");
        const resultsDiv = this.resultsDOM;
        const successHTML = this.resultMarkup;
        
        serializedFrm.append("async-upload", this.file.files[0]);
        serializedFrm.append("name", this.file.files[0].name);

        const paramsObj = {
            method: 'POST',
            credentials: 'same-origin',
            headers: new Headers({
                'Content-Type': 'application/x-www-form-urlencoded'
            }),
            body: serializedFrm
        }

        fetch(ajaxUrl, paramsObj)
            .then(response => response.text())
            .then(data => {data ? resultsDiv.innerHTML = successHTML : 'No se pudo añadir el post'; })
            .catch(e => console.log('error', e));
    }
}

export {
    PostQuestions
}