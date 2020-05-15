import { serialize } from '../utils';

class FetchQuestions {
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

        // Dom events
        const loader = `<div class="form--loader"><span>Loading..</span></div>`;
        resultsDiv.classList.add('loading');
        resultsDiv.innerHTML = loader; 

        fetch(ajaxUrl, paramsObj)
            .then(response => response.text())
            .then(data => {
                if(data) {
                    resultsDiv.innerHTML = data;
                    resultsDiv.classList.remove('loading');
                } 
            })
            .catch(e => console.log('error', e));
    }
}

export {
    FetchQuestions
}