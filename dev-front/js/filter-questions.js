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
    const resultsWrapper = document.getElementById('QuestionsPostResult');
    const successMarkup = `<div class="form-success"><h2>Tu pregunta está pendiente de ser aprobada</h2></div>`;

    if (formPost.length > 0) {
        formPost.addEventListener('submit', function(e) {
            const createPost = new PostQuestions(formPost, resultsWrapper, successMarkup, fileInput);
            e.preventDefault();
        });
    }
}

export {
    buildQuestionsFilters,
    buildQuestionsPost
}