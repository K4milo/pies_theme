import { fetchQuestions } from './api/_questions-calls';

// Fetch filters module 
const buildQuestionsFilters = function () {
    const filterWrapper = document.getElementById('QuestionsFilter');
    const resultsWrapper = document.getElementById('QuestionsResponse');

    if (filterWrapper.length > 0) {
        filterWrapper.addEventListener('input', function(e) {
            const createFilters = new fetchQuestions(filterWrapper, resultsWrapper);
            e.preventDefault();
        });
    }
}

export {
    buildQuestionsFilters
}