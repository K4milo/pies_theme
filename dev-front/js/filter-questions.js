import { FetchQuestions } from './api/_questions-calls';
import { PostQuestions } from './api/_question-post';

// Fetch filters module 
const buildQuestionsFilters = function () {
    const filterWrapper = document.getElementById('QuestionsFilter');
    const resultsWrapper = document.getElementById('QuestionsResponse');

    if (filterWrapper.length > 0) {
        filterWrapper.addEventListener('submit', function(e) {
            const createFilters = new FetchQuestions(filterWrapper, resultsWrapper);
            e.preventDefault();
        });
    }
}

// Build post object
const buildQuestionsPost= function () {
    const formPost = document.getElementById('QuestionsPost');
    const fileInput = document.getElementById('avatar');
    const responseWrapper = document.getElementById('QuestionsPostResult');
    const successMarkup = `<div class="form-success"><p>Hemos recibido tu pregunta</p><span class="form-success--icon">icon</span><h4>¡Pronto te responderemos!</h4></div>`;

    if (formPost.length > 0) {
        formPost.addEventListener('submit', function(e) {
            const createPost = new PostQuestions(formPost, responseWrapper, successMarkup, fileInput);
            e.preventDefault();
        });
    }
}

export {
    buildQuestionsFilters,
    buildQuestionsPost
}