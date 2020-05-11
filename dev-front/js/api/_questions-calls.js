class fetchQuestions {
    constructor(wrapper, resultWrapper) {
        this.wrapper = wrapper;
        this.results = resultWrapper;
        this.bringQuestions();
    }

    bringQuestions() {
        if (this.wrapper) {
            this.wrapper.addEventListener('submit', this.fetchResponse());
        }
    }

    fetchResponse() {

        const serializedFrm = serialize(this.wrapper);
        const paramsObj = {
            method: 'POST',
            credentials: 'same-origin',
            headers: new Headers({
                'Content-Type': 'application/x-www-form-urlencoded'
            }),
            body: serializedFrm
        }

        fetch(ajaxSettings.ajaxurl, paramsObj)
            .then((resp) => resp.json())
            .then(function (data) {
                if (data.status == "success") {
                    this.results.innerHTML = data;
                    console.table(data);
                }
            })
            .catch(function (error) {
                console.log(JSON.stringify(error));
            });
    }
}

export default {
    fetchQuestions
}