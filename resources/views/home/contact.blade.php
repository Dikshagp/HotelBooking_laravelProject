<div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact Us</h2>
             </div>
             <div>
              @if(session()->has('message'))
               <div class="alert alert-success">
                  <button type="button" class="close" data-bs-dismiss='alert'>X</button>
                  {{session()->get('message')}}

               </div>

              

              @endif
             </div>



          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
             <form id="request" class="main_form" action="{{url('contact_details')}}" method="post">
               @csrf
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="Name" type="type" name="name" required> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Email" type="email" name="email" required> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>                          
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="text" name="message" required>Message</textarea>
                   </div>
                   <div class="col-md-12">
                      <button class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">
             <div class="map_main">
                <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d3785.9672297503607!2d77.11015707518864!3d18.394342532674916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x3bcfaa22e181bc55%3A0x9e23d9d4a431145!2sUdgir%2C%20Maharashtra!3m2!1d18.3942882!2d77.11260089999999!4m3!3m2!1d18.3939374!2d77.11269349999999!5e0!3m2!1sen!2sin!4v1724949894665!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

