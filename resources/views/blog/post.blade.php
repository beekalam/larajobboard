@extends('layouts.app')

@section('content')
    {{--    @include('layouts._search')--}}
    {{--    @include('layouts._stats')--}}
    @include('layouts._overlay')
<section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 blog-content">

            <h3 class="mb-4">{{ $post->title }}</h3>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt,
              qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p>
            <p><img src="/images/sq_img_1.jpg" alt="" class="img-fluid rounded"></p>

              {{ $post->content }}
    
            <div class="pt-5">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="/images/person_2.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jacob Smith</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                      ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                      impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
                </li>
    
                <li class="comment">
                  <div class="vcard bio">
                    <img src="/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Chris Meyer</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                      ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                      impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
    
                  <ul class="children">
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="/images/person_2.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Chintan Patel</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                          ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                          impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                      </div>
    
    
                      <ul class="children">
                        <li class="comment">
                          <div class="vcard bio">
                            <img src="/images/person_1.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>Jean Doe</h3>
                            <div class="meta">January 9, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                              necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure!
                              Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                          </div>
    
                          <ul class="children">
                            <li class="comment">
                              <div class="vcard bio">
                                <img src="/images/person_2.jpg" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>Ben Afflick</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                  necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste
                                  iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
    
                <li class="comment">
                  <div class="vcard bio">
                    <img src="/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                      ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                      impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
    
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>
    
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary btn-md">
                  </div>
    
                </form>
              </div>
            </div>
    
          </div>
          <div class="col-lg-4 sidebar pl-lg-5">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control form-control-lg" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box">
              <img src="/images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4 w-50 rounded-circle">
              <h3>About The Author</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate
                quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit
                cupiditate numquam!</p>
              <p><a href="#" class="btn btn-primary btn-sm">Read More</a></p>
            </div>
    
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Creatives <span>(12)</span></a></li>
                <li><a href="#">News <span>(22)</span></a></li>
                <li><a href="#">Design <span>(37)</span></a></li>
                <li><a href="#">HTML <span>(42)</span></a></li>
                <li><a href="#">Web Development <span>(14)</span></a></li>
              </div>
            </div>
    
    
            <div class="sidebar-box">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate
                quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit
                cupiditate numquam!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
