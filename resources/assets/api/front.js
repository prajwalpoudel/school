export default {
    register(data) {
        return axios.post(`/register`, data);
    }
};
