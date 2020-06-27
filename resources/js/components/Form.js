import React,{ Component }  from 'react';
import ReactDOM from 'react-dom';


export default class Form extends React.Component{

	constructor(props){
		super(props)

		this.state = {
			count:0
		};

		this.increment = this.increment.bind(this)
		this.decrement = this.decrement.bind(this)
		this.reset = this.reset.bind(this)
	}

	increment(){
		this.setState(state=>({
			count:state.count+1
		}));
	}

	decrement(){
			this.setState(state=>({
			count:state.count-1
		}));
	}

	reset(){
		this.setState(state=>({
			count:0
		}));
	}

	render(){
		return(
				<div>
					<h1>Ramin</h1>
					<h1>Current count:{this.state.count}</h1>
					<button onClick={this.increment}>+</button>
					<button onClick={this.decrement}>-</button>
					<button onClick={this.reset}>reset</button>
				</div>
			)
	}
}



if(document.getElementById("home")){
ReactDOM.render(<Form/>,document.getElementById("home"));
}