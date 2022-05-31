import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';
import axios from 'axios';
import { FaHeart } from "react-icons/fa";
import { FaRegHeart } from "react-icons/fa";
import { IconContext } from 'react-icons' 




class LikeApp extends React.Component{
	constructor(props){
		super(props);
		this.state ={
			like:[],
			unLike:[],
			authorLike:'',
			count:'',
		}
		this.fetchCount = this.fetchCount.bind(this);
	}
	componentDidMount(){
		this.fetchCount();
	}
	fetchCount(){
		let question_id = this.props.question_id? this.props.question_id :$('.question').data('id');
		let comment_id = this.props.comment_id? this.props.comment_id :0;

		axios.get('/like/'+ question_id +'/'+ comment_id)
			 .then((response)=>{
			 	//console.log(response.data)
					this.setState({
			 		count:response.data.count,
			 		authorLike:response.data.authorLike,
			 	})
			 	
			 })
	}
	render(){

		return(
			<React.Fragment>
				<Button 
					authorLike={this.state.authorLike}
					question_id={
						this.props.question_id?this.props.question_id:$('.question').data('id')
					}
					comment_id = {
						this.props.comment_id?this.props.comment_id:0
					}
					fetchCount = {this.fetchCount}
				/>
				<Count count={this.state.count} />
			</React.Fragment>

			)
	}

}


class Button extends React.Component{
	constructor(props){
		super(props);
		this.state = {
			
		}
		this.handleClickLike = this.handleClickLike.bind(this);
		this.handleClickunLike = this.handleClickunLike.bind(this);
	}

	handleClickLike(e){
		e.preventDefault();
		let question_id = this.props.question_id;
		let comment_id = this.props.comment_id;
		axios.post('/like/' +question_id+'/'+comment_id,{
			'question_id':question_id,
			'comment_id': comment_id,
		}).then((response)=>{
			//console.log('likeSuccess');
			if(response.data.msg){
				alert(response.data.msg)
			}
			this.props.fetchCount();
		})

	}
	handleClickunLike(e){
		e.preventDefault();
		let question_id = this.props.question_id;
		let comment_id = this.props.comment_id;
		axios.post('/unlike/' +question_id+'/'+comment_id,{
			'question_id':question_id,
			'comment_id': comment_id,
		}).then((response)=>{
			//console.log('unlikeSuccess');
			this.props.fetchCount();
		})

	}

	render(){
		return( 
			<div className="like-btn">	
			    <a href="" className={this.props.authorLike? "js-unlike unlike show":"js-unlike unlike" } onClick={this.handleClickunLike}>
			     <IconContext.Provider value={{ color: 'red'}}>	
			    	<FaHeart />
			     </IconContext.Provider>
				</a>				   
				<a href="" className={this.props.authorLike? "js-like like":"js-like like show"} onClick={this.handleClickLike}>
					<FaRegHeart />
				</a>
		     </div>
			)
	}
}

class Count extends React.Component{
	constructor(props){
		super(props);
	}
	render(){
		return( 
			<div className="like-count js-like-count">
				{this.props.count}
		    </div>
			)
	}
}


export default LikeApp;
const root = document.getElementById('like-app');
if(root){
	ReactDOM.render(<LikeApp />, root);
}






