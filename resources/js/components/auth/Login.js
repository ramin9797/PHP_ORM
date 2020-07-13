import React,{ Component }  from 'react';
import ReactDOM from 'react-dom';

import loginImg from "../../../images/login.png";


export default class Login extends React.Component{

	constructor(props){
		super(props)


		this.state = {
			
		};

		
	}



	render(){
		const pathToImg = loginImg
		const str = pathToImg.replace(/^\/|\/$/g, '')

		return(
				<div>
					<h1>Login</h1>
					<img src={str} className="my-img"/>
					<h1>Register</h1>
				</div>
			)
	}
}
