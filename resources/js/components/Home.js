import React,{ Component }  from 'react';
import ReactDOM from 'react-dom';
import Header from './layouts/Header';
import Footer from './layouts/Footer';
import Aside from './layouts/Aside';
import MainContent from './layouts/MainContent';


export default class Home extends React.Component{

	constructor(props){
		super(props)

		this.state = {
			
		};

		// this.reset = this.reset.bind(this)
	}

	

	// reset(){
	// 	this.setState(state=>({
	// 		count:0
	// 	}));
	// }

	render(){
		return(
				<div className="welcome-app">
					<Header/>
					 <main>
						<MainContent/>
						<Aside/>
					</main>
					<Footer/>
				</div>
			)
	}
}



if(document.getElementById("home")){
ReactDOM.render(<Home/>,document.getElementById("home"));
}