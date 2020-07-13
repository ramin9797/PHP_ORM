import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import axios from "axios";

import Img from "../../../images/site-icon.png";

export default class Header extends React.Component{


    constructor(props) {
        super(props);
        this.state = {
            data:[]
        }
    }



    UNSAFE_componentWillMount(){
        let $this = this;

        axios.get("api/all_cats").then(response=> {
            $this.setState({
                data:response.data
            })
        }).catch(error => {
            console.log(error)
        })
    }

    render() {
        // const pathToImg = Img
        // const str = pathToImg.replace(/^\/|\/$/g, '')

        return (
           
        )
    }

}