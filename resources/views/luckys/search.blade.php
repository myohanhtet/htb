<div class="row">
                
                  <form method="GET" action="{{ route('lucky.find') }}">
                  <div class="col-lg-6">
                  <div class="">
                    <input type="text" class="form-control" placeholder="Sayadaw Name" name="win_name"><br>
                    <input type="text" class="form-control" placeholder="Lucky Number..." name="lucky_no">
                    <span class="pull-right"><br>
                      <button class="btn btn-success" type="submit">Go!</button>
                    </span>
                  </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  </form>
                

                
                  <form method="GET" action="{{ route('lucky-find.edit') }}">
                    <div class="col-lg-6">
                  <div class="input-group">
                    <input type="number" class="form-control" placeholder="Search for ID Number" name="id">
                    <span class="input-group-btn">
                      <button class="btn btn-success" type="submit">Edit</button>
                    </span>
                  </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  </form>
                
              </div>