import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';


export default class Tests extends React.Component{

    constructor(){
        super()
        this.state = {
          input:'',
          items:[],
          art_create_suc_state:true,
          li_show:true,
          last_id_li:'',
        }
        this.handleChange = this.handleChange.bind(this)
        this.handleSubmit = this.handleSubmit.bind(this)


    }



    UNSAFE_componentWillMount(){
        let self = this;

        axios.get("api/test_show").then(response=>{
          // console.log(response.data)
          const data = response.data
          if(Array.isArray(data))
            {
                if(response.data){
                    self.setState({
                        items:data,
                         li_show:true,
                    })
                  }
            }
          else
           {

             if(response.data){
              self.setState({
                items:[...self.state.items,data]
              })
            }
           }

        }).catch(error=>{
            console.log(error)
        })
         
    }




    handleChange(event){
        
        this.setState({
            input:event.target.value
        })

    }

    handleSubmit(event){
        event.preventDefault()
       const item = this.state.input



       const  art_create_suc = this.state.art_create_suc_state

       if(this.state.input){

           axios.post('test/create/'+item).then(response=>{
               const new_task = {'task':item,'id':response.data}
                this.setState({
                    items:[...this.state.items,new_task],
                    input:'',
                    art_create_suc_state: !art_create_suc,
                    last_id_li:response.data,
                    li_show:true
                })

                setTimeout(() => {
                     this.setState({
                         art_create_suc_state: !this.state.art_create_suc_state,
                     })

                }, 1600);

                setTimeout(() => {
                     this.setState({
                      li_show:!this.state.li_show
                     })

                }, 1000);



           }).catch(error =>{
                console.log(error)
           })

         }

    }



    handleDelete(item){

        const new_list = this.state.items.slice()

        new_list.splice(new_list.indexOf(item),1)

        axios.delete('test/delete/'+item.id).then(response=>{
            console.log(response.data)

               this.setState({
                    items:new_list
                })

        }).catch(error=>{
            console.log(error)
        })
     

    }


    render(){
        return(
                <div className='test-div'>

                <div ref='art_create_suc' className={`test_success  ${this.state.art_create_suc_state?"hide_block":"show_block"}`  }>
                    <p>Article was created successfully!Cooool,man ))</p>
                </div>

                    <form onSubmit={this.handleSubmit}>
                        <input value={this.state.input} onChange={this.handleChange} type="text" placeholder="Enter something"/>
                        <button type="submit">Add</button>
                    </form>

                    <div className="test_block">

                    <ul>
                        {this.state.items? this.state.items.map((item,index) => 
                            <li className={`test_block_li ${this.state.last_id_li==item.id&&this.state.li_show?"hide_block":"show_block"}`} key={index}>{item.task}
                                <button onClick={this.handleDelete.bind(this,item)}>Delete</button>
                            </li>
                         ):null}
                    </ul>

                    </div>

                </div>

            )
    }


}

if(document.getElementById('react_test'))
  ReactDOM.render(<Tests/>,document.getElementById('react_test'))