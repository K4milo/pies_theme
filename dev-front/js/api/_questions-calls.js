import { serialize } from '../utils';

class fetchQuestions {
    constructor(wrapper, resultWrapper) {
        this.wrapper = wrapper;
        this.resultsDOM = resultWrapper;
        this.fetchResponse();
    }

    fetchResponse() {
        const serializedFrm = serialize(this.wrapper);
        const ajaxUrl = this.wrapper.getAttribute("action");
        const resultsDiv = this.resultsDOM;
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
            .then(data => {data ? resultsDiv.innerHTML = data : 'No existen resultados'; })
            .catch(e => console.log('error', e));
    }
}

export {
    fetchQuestions
}