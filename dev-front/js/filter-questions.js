import fetchQuestions from './api/_questions-calls';

// Fetch filters module 
const buildQuestionsFilters = () => {
    const filterWrapper = document.getElementById('QuestionsFilter');
    const resultsWrapper = document.getElementById('QuestionsResponse');

    const createFilters = new fetchQuestions(filterWrapper, resultsWrapper);

    if (filterWrapper.length > 0) {
        createFilters();
    }
}

export default {
    buildQuestionsFilters
}