import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';
import axios from 'axios';
import LikeApp from './Like';

class CommentApp extends React.Component{
	constructor(props){
		super(props);
		this.state = {
			comments: [],
			users:[],
			time:[],
			auth:'',
		}
		this.fetchComment = this.fetchComment.bind(this);
	}
	componentDidMount(){
		this.fetchComment();
	}
	
	fetchComment(){
		let question_id = $('.question').data('id');
			axios.get('/comment/'+question_id )
				.then((response)=> {
					//console.log(response.data);
				  this.setState({
				  	comments:response.data.comments,
				  	users:response.data.users,
				  	time:response.data.time,
				  	auth:response.data.auth?true:false,
				  });

			});
	}
	render(){
		
		return(
			<React.Fragment>		
				<Form 
					fetchComment ={this.fetchComment}
				/>
				<FetchComment 
					comments={this.state.comments} 
					users = {this.state.users}
					time = {this.state.time}
					auth = {this.state.auth}
				/>
			</React.Fragment>	
			)
	}
}


class Form extends React.Component{
	constructor(props){
		super(props);
		this.handleSubmit = this.handleSubmit.bind(this);
	}
	handleSubmit(e){
		e.preventDefault();

			axios.post('/comment/store',{
				'question_id': $('.question').data('id'),
				'content': $("textarea[name='content']").val(),
			}).then((response)=> {
				console.log(response.data)
				if(!response.data.msg){
					$("textarea[name='content']").val('');
					this.props.fetchComment();
				}else{
					alert(response.data.msg);
				}
			});
	}
	render(){
		return(
			<div className="col-sm-12 comment js-fixed" id="store-comment">
				<form method="post" onSubmit={this.handleSubmit} >
				     <textarea className="form-control" name="content" rows="2" placeholder="Type Comment"></textarea> 
		    		<button type="submit" className="form-btn btn">
		    			コメント
		    		</button> 		
		    	</form>
		    </div>

			)
	}
}



class FetchComment extends React.Component{
	constructor(props){
		super(props);
	}	
	render(){
		return(
			<React.Fragment>
			<div className="title">コメント一覧</div>
				<div className={!this.props.auth?'visiter-advice show':'visiter-advice'}>コメント閲覧希望は<a href="../../register">ユーザー登録が必要です</a></div>
				<div className={!this.props.auth?'visiter-blur show':'visiter-blur'}>
				<div className="col-sm-8 comment-list" id='comment-list'>

				 {this.props.comments.map((comment,i) =>
					 <div className="comment-list-item" data-comment-id="{comment.question_id}" key={comment.id}>			
					     <div className="js-comment-content">{comment.content}</div>
					     <div className="post-desc">
			    			<div className="js-post-profile post-profile">
				        		{this.props.users[i].hotel_type}に{this.props.users[i].work_length}お勤めの{this.props.users[i].username} さん
				        	</div>
				         </div>
				        <div className="post-desc">
				        	<div className="like-area js-like-area" id="like-app" data-comment-id={comment.id}>	        		        	
			        			<LikeApp 
			        				question_id={comment.question_id} 
			        				comment_id = {comment.id}
			        			/>
			        		</div>
				        	<div className="js-post-date post-date">
				        		{this.props.time[i]}
				        	</div>
				        	
			        	</div>
			    	 </div>
				 )}
				</div>
				</div>
			</React.Fragment>
			)
	}


}

const root = document.getElementById('comment-app');
if(root){
	ReactDOM.render(<CommentApp />, root);
}





