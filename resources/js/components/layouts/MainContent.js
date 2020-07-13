import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import axios from "axios";

export default class MainContent extends React.Component{

    constructor(props){
        super(props)

        this.state = {
            data:[]
        }
    }

    UNSAFE_componentWillMount(){
        let $this = this;

        axios.get("api/articles").then(response => {
            $this.setState({
                data:response.data
            })
        }).catch(error => {
            console.log(error)
        })
    }


    render() {

        return (
           <article>
           
           {this.state.data.map((article,index) => (
                <p key={index}>{article.title}</p>
            ))}

           </article>
        )
    }

}