const system = {
    state: {
        dir: null,
        language: null
    },
    getters: {
       dir: state => {
           return state.dir;
       },
       language: state => {
           return state.language;
       }
    },
    mutations: {
        changeDir(state, payload) {
            state.dir = payload;
        },
        changeLanguage(state, payload) {
            state.language = payload;
        }
    },
};

export default system;