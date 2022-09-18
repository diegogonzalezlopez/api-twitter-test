<table class="tweets">

	<tr>
		<th>ID</th>
		<th>USER</th>
		<th>TEXT</th>
		<th>RETWEETS</th>
		<th>REPLY</th>
		<th>LIKE</th>
		<th>QUOTES</th>
	</tr>

	<tr v-for="(tweet, index) in data">

		<td>
			{{ tweet.id }}
		</td>

		<td>
			<div v-for="(user, index) in includes.users" v-if="tweet.author_id == user.id">
				<p>
					{{ user.name }}
				</p>
				<p>
					@{{ user.username }}
				</p>
			</div>
		</td>

		<td>
			{{ tweet.text }}
		</td>

		<td>
			{{ tweet.public_metrics.retweet_count }}
		</td>

		<td>
			{{ tweet.public_metrics.reply_count }}
		</td>

		<td>
			{{ tweet.public_metrics.like_count }}
		</td>

		<td>
			{{ tweet.public_metrics.quote_count }}
		</td>

	</tr>

</table>