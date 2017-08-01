<!-- Bootstrap popup for Email  -->
<div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                  <form class="" action="/sendPDF" method="post">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Email</h4>
                        </div>
                        <div class="modal-body">
                              {{ csrf_field() }}
                              <input type="email" class="form-control" id="email" name="email"
                                     value=""
                                     placeholder="Enter Email Address" required>

                        </div>
                        <div class="modal-footer">
                              <button type="submit" name="send" class="btn btn-primary">Go</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                  </form>
            </div>

      </div>
</div>
<!-- Done Model -->

<!-- Bootstrap Popup to show sucessfull msg -->
<div id="myDoneModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="padding:0%">

                  <div class="modal-content" style="padding:%">

                        <div style="margin-top:%">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div align="center" style="margin-top:5%">
                              <i class="fa fa-check-circle" style="color:#33cc33;font-size:50px;"></i>
                        </div>

                        <div align="center" style="margin:3% 0 5% 0">

                              @if(session('status') == 'Mail Sent')
                              <strong>Mail Sent Successfully</strong>
                              @elseif(session('status') == 'Tweet Posted')
                              <strong>Tweet Successfully Posted</strong>
                              @endif
                        </div>

                  </div>

            </div>
      </div>
</div>
<!-- end model -->
{{--Post Tweet model--}}
<div id="myPostTweetModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                  <form class="" action="/postTweet" method="post">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Post New Tweet</h4>
                        </div>
                        <div class="modal-body">
                              {{ csrf_field() }}
                              <textarea  class="form-control" name="tweet" value="" rows="5" placeholder="Tweet Here" required></textarea>

                        </div>
                        <div class="modal-footer">
                              <button type="submit" name="post" class="btn btn-primary">Post</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                  </form>
            </div>

      </div>
</div>