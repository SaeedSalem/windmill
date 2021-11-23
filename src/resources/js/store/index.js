import Vue from "vue";
import Vuex from "vuex";
import SystemModule from "./modules/SystemModule";
import DashboardModule from "./modules/DashboardModule";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {

    },
    getters: {
       
    },
    mutations: {
        
    },
    modules  : {
        SystemModule: SystemModule,
        DashboardModule: DashboardModule
    }
});

export default store;