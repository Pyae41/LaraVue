import axios from "axios";

class Auth{
    token = '';
    user = [];

    constructor(){
        this.token = window.sessionStorage.getItem('token');
        this.userData = window.sessionStorage.getItem('user');
        this.user = this.userData ? JSON.parse(this.userData) : null;

        if(this.token){
            axios.defaults.headers.common["Authorization"] = 'Bearer' + this.token;
        }
    }

    login(token,user){
        window.sessionStorage.setItem('token',token);
        window.sessionStorage.setItem('user',JSON.stringify(user));
        axios.defaults.headers.common["Authorization"] = 'Bearer' + token;


        this.token = token;
        this.user = user;
    }
    check(){
        return !! this.token;
    }

    logout(){
        window.sessionStorage.removeItem('token');
        window.sessionStorage.removeItem('user');
        this.user = null;
    }
}

export default new Auth();
