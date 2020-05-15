import { serialize } from '../utils';

class FetchQuestions {
    constructor(wrapper, resultWrapper) {
        this.wrapper = wrapper;
        this.resultsDOM = resultWrapper;
        this.fetchResponse();
    }

    fetchResponse() {
        const serializedFrm = serialize(this.wrapper);
        const formWraper = this.wrapper;
        const ajaxUrl = this.wrapper.getAttribute("action");
        const resultsDiv = this.resultsDOM;
        const loader = `<div class="form--loader"><span>Loading..</span></div>`;

        // Add loader
        formWraperclassList.add('form--loading');
        formWraper.innerHTML = loader;

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
            .then(data => {
                if(data){
                    console.log('data', data);
                    resultsDiv.innerHTML = data; 
                    this.wrapper.innerHTML ='';
                }
                else {
                    this.wrapper.innerHTML ='<h2 class="form-error"> No hemos podido añadir tu pregunta, intenta nuevamente.</h2>';
                }
            })
            .catch(e => console.log('error', e));
    }
}

export {
    FetchQuestions
}