import axios from "@/axios";

const state = {
    newComment: '',
};
const getters = {
    newComment: function (state) {
        return state.newComment;
    }
};
const mutations = {
    setNewComment(state, newComment) {
        state.newComment = newComment;
    }
};
const actions = {
        //store comment to db
        createNewComment(context, newComment) {
            context.commit('setNewComment', newComment)

            return new Promise((resolve, reject) => {
                axios
                    .post("comment", newComment)
                    .then((response) => {
                        resolve(response);
                    })
                    .catch((error) => {
                        reject(error);
                    });
            });

        },
    }
;

export default {
    state,
    getters,
    mutations,
    actions,
};