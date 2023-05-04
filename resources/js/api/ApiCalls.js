import axios from "axios";
import constants from "../constants/constants";
import Auth from "../auth/Auth";
import router from "../routes/router";

class ApiCalls {

    async get(endpoint) {

        let data = await axios.get(constants.BASE_URL + endpoint)
            .then(resposne => resposne.data)
            .catch(error => error.data);

        return data;
    }

    async getById(endpoint) {
        let data = await axios.get(constants.BASE_URL + endpoint, {
            headers: {
                "Content-Type": "application/json",
                'Accept': "application/json"
            }
        })
            .then(resposne => resposne.data)
            .catch(error => error.data);

        return data;
    }

    post(endpoint, data) {
        axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data'
            }
        })
            .then(response => console.log(response))
            .catch(error => console.log(error));
    }

    async filter(endpoint, data) {
        let rData = await axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data'
            }
        })
            .then(response => response.data)
            .catch(error => console.log(error));

        return rData;
    }

    async search(endpoint, data) {
        let sData = await axios.post(constants.BASE_URL + endpoint, data,{
            'Content-Type' : 'application/json',
        })
            .then(response => response.data)
            .catch(error => console.log(error));

        return sData;
    }




    update(endpoint, data) {
        axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data'
            },
            params: {
                _method: "put"
            }
        })
            .then(response => console.log(response))
            .catch(error => console.log(error));
    }

    delete(endpoint) {
        axios.delete(constants.BASE_URL + endpoint)
            .then(response => console.log(response))
            .catch(error => console.log(error));
    }

    login(user) {
        axios.post(constants.BASE_URL + 'login', user, {
            headers: {
                'Content-Type': 'application/json',
            }
        })
            .then(response => {

                let data = response.data;
                // console.log();
                Auth.login(data.authorization.token, data.user);

                router.push({ path: '/dashboard' });
            })
            .catch(error => console.log(error));
    }

    logout() {
        axios.post(constants.BASE_URL + 'logout')
            .then(response => console.log(response))
            .catch(error => console.log(error));

        Auth.logout();

        router.push({ path: '/login' });
    }
}

export default new ApiCalls();
