export default {
    storeClassRoutine: function (data) {
        return axios.post(`/admin/routine/class`, data);
    }
};
