import React, { Component } from 'react';
import './assets/css/App.css';
import {connectGlobalState} from 'react-state-util';
import Api from "./services/Api";
import Login from "./pages/user/Login";
import Dashboard from "./pages/dashboard/Dashboard";

class App extends Component {
    state = {}
    
    async componentWillMount() {
        let response = await Api.get('user/me');

        if (response.result && !response.error) {
            this.setGlobalState({
                user: response.result
            });
        } else {
            this.setGlobalState({
                user: null
            });
        }
    }

    render() {

        let {user} = this.globalState;

        return (
            <div id="heartbeat">
                {user ? <Dashboard /> : <Login />}
            </div>
        );
    }
}

export default connectGlobalState(App);
