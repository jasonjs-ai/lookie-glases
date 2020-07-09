		<!-- Start Footer Area -->
		<footer class="footer_area">
		    <div class="footer_top bg-cat--1">
		        <div class="container">
		            <div class="row">
		                <!-- Start Single Footer -->
		                <div class="col-lg-3 col-sm-6 col-12 mb--50">
		                    <div class="footer_widget">
		                        <h2 class="ft_widget_title">Our Location</h2>
		                        <div class="textwidget">
		                            <p><?= $base_controller->Configs->ADDRESS; ?></p>
		                            <p><?= $base_controller->Configs->PHONE; ?></p>
		                            <p><?= $base_controller->Configs->EMAIL; ?></p>
		                        </div>
		                    </div>
		                </div>
		                <!-- End Single Footer -->
		            </div>
		        </div>
		        <div class="copyright bg-cat--2">
		            <div class="container">
		                <div class="row align-items-center">
		                    <div class="col-lg-6">
		                        <div class="copy_text">
		                            <p> <?= Date("Y"); ?> </p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		</footer>
		<!-- End Footer Area -->

		<!-- Quick View Modal -->
		<div class="quick-view-modal">
		    <div class="quick-view-modal-inner">
		        <div class="container">
		            <div class="product-details">
		                <!-- Product Details Left -->
		                <div class="product-details-left">
		                    <div class="product-details-images slider-navigation-2">
		                        <a href="<?= base_url(); ?>assets/img/product/sm1.png">
		                            <img src="<?= base_url(); ?>assets/img/product/big-img.png" alt="product image">
		                        </a>
		                        <a href="<?= base_url(); ?>assets/img/product/sm2.png">
		                            <img src="<?= base_url(); ?>assets/img/product/big-img.png" alt="product image">
		                        </a>
		                        <a href="<?= base_url(); ?>assets/img/product/sm3.png">
		                            <img src="<?= base_url(); ?>assets/img/product/big-img.png" alt="product image">
		                        </a>
		                        <a href="<?= base_url(); ?>assets/img/product/sm1.png">
		                            <img src="<?= base_url(); ?>assets/img/product/big-img.png" alt="product image">
		                        </a>
		                        <a href="<?= base_url(); ?>assets/img/product/sm1.png">
		                            <img src="<?= base_url(); ?>assets/img/product/big-img.png" alt="product image">
		                        </a>
		                    </div>
		                    <div class="product-details-thumbs slider-navigation-2">
		                        <img src="<?= base_url(); ?>assets/img/product/sm1.png" alt="product image thumb">
		                        <img src="<?= base_url(); ?>assets/img/product/sm2.png" alt="product image thumb">
		                        <img src="<?= base_url(); ?>assets/img/product/sm3.png" alt="product image thumb">
		                        <img src="<?= base_url(); ?>assets/img/product/sm1.png" alt="product image thumb">
		                        <img src="<?= base_url(); ?>assets/img/product/sm1.png" alt="product image thumb">
		                    </div>
		                </div>
		                <!--// Product Details Left -->

		                <!-- Product Details Right -->
		                <div class="product-details-right">
		                    <h5 class="product-title">Aenean Eu Tristique</h5>

		                    <div class="ratting-stock-availbility">
		                        <div class="ratting-box">
		                            <span><i class="fa fa-star"></i></span>
		                            <span><i class="fa fa-star"></i></span>
		                            <span><i class="fa fa-star"></i></span>
		                            <span><i class="fa fa-star"></i></span>
		                            <span><i class="fa fa-star"></i></span>
		                        </div>
		                        <span class="stock-available">In stock</span>
		                    </div>

		                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. adipiscing cursus eu, suscipit id nulla.</p>

		                    <div class="price-box">
		                        <span class="pricebox-price">£80.00</span>
		                    </div>

		                    <div class="product-details-quantity">
		                        <div class="quantity-select">
		                            <div class="pro-quantity">
		                                <div class="pro-qty"><input type="text" value="1"></div>
		                            </div>
		                        </div>
		                        <a href="#" class="add-to-cart-button">
		                            <span>ADD TO CART</span>
		                        </a>
		                    </div>

		                    <div class="product-details-color">
		                        <span>Color :</span>
		                        <ul>
		                            <li class="red"><span></span></li>
		                            <li class="green checked"><span></span></li>
		                            <li class="blue"><span></span></li>
		                            <li class="black"><span></span></li>
		                        </ul>
		                    </div>

		                    <div class="product-details-size">
		                        <span>Size :</span>
		                        <ul>
		                            <li class="checked"><span>S</span></li>
		                            <li><span>M</span></li>
		                            <li><span>L</span></li>
		                            <li><span>XL</span></li>
		                            <li><span>XXL</span></li>
		                        </ul>
		                    </div>

		                    <div class="product-details-categories">
		                        <span>Categories :</span>
		                        <ul>
		                            <li><a href="shop.html">Accessories</a></li>
		                            <li><a href="shop.html">Kids</a></li>
		                            <li><a href="shop.html">Women</a></li>
		                        </ul>
		                    </div>

		                    <div class="product-details-tags">
		                        <span>Tags :</span>
		                        <ul>
		                            <li><a href="shop.html">Electronic</a></li>
		                            <li><a href="shop.html">Television</a></li>
		                        </ul>
		                    </div>

		                    <div class="product-details-socialshare">
		                        <span>Share :</span>
		                        <ul>
		                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
		                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
		                            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
		                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
		                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
		                        </ul>
		                    </div>
		                </div>
		                <!--// Product Details Right -->

		            </div>
		        </div>
		    </div>
		    <button class="close-quickview-modal"><i class="fa fa-close"></i></button>
		</div>
		<!--// Quick View Modal -->

		</div>
		<!--// Wrapper -->

		<!-- Js Files -->
		<script src="<?= base_url(); ?>assets/js/vendor/modernizr-3.6.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/plugins.js"></script>
		<!-- Select2 -->
		<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
		<!-- jquery -->
		<!-- three.js r54 -->
		<script src="<?= base_url(); ?>assets/js/three.js"></script>
		<!-- clmtrack -->
		<script src="<?= base_url(); ?>assets/js/utils.js"></script>
		<script src="<?= base_url(); ?>assets/js/clmtrackr.js"></script>
		<script>
             var isready = false;
		    $(document).ready(function() {
		       
		        $('#glasses').select2({
		            placeholder: "Pilih Kacamata"
		        });
		        GetListGlasses();

		        $("#glasses").on("change", function() {
		            if (isready) {
		                window.location.href = "<?= base_url("VTO?p="); ?>" + $("#glasses").val();
		            }
		        });
		    });

		    function GetListGlasses() {
		        $('#glasses').empty().trigger("change");
		        $.ajax({
		            type: 'GET',
		            url: "<?= base_url(); ?>" + "SelectList/GetListGlasses",
		            success: function(data) {
		                for (var i = 0; i < data.length; i++) {
		                    var newOption = new Option(data[i].text, data[i].value, true, true);
		                    $("#glasses").append(newOption).trigger('change');
		                }
		                $('#glasses').val('<?= $this->session->userdata('code'); ?>').trigger("change");
		                isready = true;
		            },
		            error: function(jqXHR, textStatus, errorThrown) {

		            }
		        });

		    }
		</script>

		<script>
		    (function() {
		        var deadline = '2019-07-27 16:10';

		        function pad(num, size) {
		            var s = "0" + num;
		            return s.substr(s.length - size);
		        }

		        function getTimeRemaining(endtime) {
		            var t = Date.parse(endtime) - Date.parse(new Date()),
		                seconds = Math.floor((t / 1000) % 60),
		                minutes = Math.floor((t / 1000 / 60) % 60),
		                hours = Math.floor((t / (1000 * 60 * 60)) % 24),
		                days = Math.floor(t / (1000 * 60 * 60 * 24));

		            return {
		                'total': t,
		                'days': days,
		                'hours': hours,
		                'minutes': minutes,
		                'seconds': seconds
		            };
		        }

		        function clock(id, endtime) {
		            var days = document.getElementById(id + '-days')
		            hours = document.getElementById(id + '-hours'),
		                minutes = document.getElementById(id + '-minutes'),
		                seconds = document.getElementById(id + '-seconds');

		            var timeinterval = setInterval(function() {
		                var t = getTimeRemaining(endtime);

		                if (t.total <= 0) {
		                    clearInterval(timeinterval);
		                } else {
		                    days.innerHTML = pad(t.days, 2);
		                    hours.innerHTML = pad(t.hours, 2);
		                    minutes.innerHTML = pad(t.minutes, 2);
		                    seconds.innerHTML = pad(t.seconds, 2);
		                }

		            }, 1000);
		        }

		        clock('js-clock', deadline);
		    })();
		</script>


		<script src="<?= base_url(); ?>assets/js/main.js"></script>
		<script>
		    /**
		     * Requires:
		     * three.js (r54) http://threejs.org/
		     * clmtrack https://github.com/auduno/clmtrackr
		     *
		     * @author Yevhen Matasar <matasar.ei@gmail.com>
		     *
		     * @param {Object} params
		     *
		     * @version 20190615
		     */
		    var TryOnFace = function(params) {
		        var ref = this;

		        this.selector = 'tryon';
		        //sizes
		        this.object = params.object;
		        this.width = params.width;
		        this.height = params.height;

		        if (params.statusHandler) {
		            this.statusHandler = params.statusHandler;
		        } else {
		            this.statusHandler = function() {};
		        }
		        this.changeStatus = function(status) {
		            this.status = status;
		            this.statusHandler(this.status);
		        };
		        this.changeStatus('STATUS_READY');

		        if (params.debug) {
		            this.debug = true;
		            this.debugMsg = this.status;
		        } else {
		            this.debug = false;
		        }

		        /* CAMERA */
		        this.video = document.getElementById('camera');
		        document.getElementById(this.selector).style.width = this.width + "px";
		        this.video.setAttribute('width', this.width);
		        this.video.setAttribute('height', this.height);

		        /* face tracker */
		        this.tracker = new clm.tracker({
		            useWebGL: true
		        });
		        this.tracker.init();

		        /**
		         * Start try-on
		         * @returns {undefined}
		         */
		        this.start = function() {
		            var video = ref.video;

		            navigator.getUserMedia = (
		                navigator.getUserMedia ||
		                navigator.webkitGetUserMedia ||
		                navigator.mozGetUserMedia ||
		                navigator.msGetUserMedia
		            );

		            if (navigator.getUserMedia) {
		                navigator.getUserMedia({
		                        video: true
		                    },
		                    function(localMediaStream) {
		                        video.srcObject = localMediaStream;
		                        video.play();
		                        ref.changeStatus('STATUS_CAMERA_ERROR');
		                    },
		                    function(err) {
		                        ref.changeStatus('STATUS_CAMERA_ERROR');
		                    }
		                );
		            } else {
		                ref.changeStatus('STATUS_CAMERA_ERROR');
		            }

		            //start tracking
		            ref.tracker.start(video);
		            //continue in loop
		            ref.loop();
		        };

		        this.debug = function(msg) {
		            if (this.debug) {
		                this.debugMsg += msg + "<br>";
		            }
		        };

		        this.printDebug = function() {
		            if (this.debug) {
		                document.getElementById('debug').innerHTML = this.debugMsg;
		                this.debugMsg = '';
		            }
		        };

		        this.loop = function() {
		            requestAnimFrame(ref.loop);

		            var positions = ref.tracker.getCurrentPosition();

		            if (positions) {
		                //current distance // jarak saat ini // mendapatkan posisi tracker
		                var distance = Math.abs(90 / ((positions[0][0].toFixed(0) - positions[14][0].toFixed(0)) / 2)); // abs(90 / posisi ke 0 - posisi ke 14/2)
		                //horizontal angle // sudut horizontal (rotasi wajah)
		                var hAngle = 90 - (positions[14][0].toFixed(0) - positions[33][0].toFixed(0)) * distance; // 90 - posisi index ke 14 - posisi index ke 33 * jarak
		                //center point// mendapatkan titik tengah
		                var center = {
		                    x: positions[33][0], // x = index ke 33
		                    y: (positions[33][1] + positions[41][1]) / 2 // y = index ke [33][1] + index ke [41][1] / 2
		                };
		                center = ref.correct(center.x, center.y);

		                var zAngle = (positions[33][0] - positions[7][0]) * -1; // mendapatkan sudut z dengan cara posisi index ke 33 - index ke 7

		                //allowable distance // jarak yang diijinkan
		                if (distance < 1.5 && distance > 0.5) { // jika jarak kurang dari 1.5 dan jarak lebih dari 0.5 maka wajah ditemukan
		                    ref.changeStatus('STATUS_FOUND');

		                    //set positions
		                    ref.position.x = center.x - (hAngle / 2);
		                    ref.position.y = center.y;
		                    ref.rotation.y = hAngle / 100 / 2;
		                    ref.rotation.z = zAngle / 100 / 1.5;
		                    //size
							//menghitung ukuran kacamata
		                    ref.size.x = ((positions[14][0] - positions[0][0]) / 2) + 0.05 * (positions[14][0] - positions[0][0]); // index ke 14 / 2 + 0.05 * index ke 14 
		                    ref.size.y = (ref.size.x / ref.images['front'].width) * ref.images['front'].height; // ref.size.x / 800 * 218
		                    ref.size.z = ref.size.x * 3; // ref.size.x * 3
		                    ref.position.z = (ref.size.z / 2) * -1; // posisi z / 2 * -1
		                    //render
		                } else {
		                    ref.changeStatus('STATUS_SEARCH');
		                    ref.size.x = 0;
		                    ref.size.y = 0;
		                }

		                ref.render();
		                ref.debug(ref.status);
		            }

		            //print debug
		            ref.printDebug();
		        };

		        /* 3D */
		        var canvas = document.getElementById("overlay");
		        var renderer = new THREE.WebGLRenderer({
		            canvas: canvas,
		            antialias: true,
		            alpha: true
		        });
		        renderer.setClearColor(0xffffff, 0);
		        renderer.setSize(this.width, this.height);

		        //add scene
		        var scene = new THREE.Scene;

		        //define sides
		        var outside = {
		            0: 'left',
		            1: 'right',
		            4: 'front'
		        };

		        this.images = [];
		        var materials = [];
		        for (i = 0; i < 6; i++) {
		            if (this.object.outside[outside[i]] !== undefined) {
		                var image = new Image();
		                image.src = this.object.outside[outside[i]];
		                this.images[outside[i]] = image;
		                materials.push(new THREE.MeshLambertMaterial({
		                    map: THREE.ImageUtils.loadTexture(this.object.outside[outside[i]]),
		                    transparent: true
		                }));
		            } else {
		                materials.push(new THREE.MeshLambertMaterial({
		                    color: 0xffffff,
		                    transparent: true,
		                    opacity: 0
		                }));
		            }
		        }

		        //init position and size
		        this.position = {
		            x: 0,
		            y: 0,
		            z: 0
		        };
		        this.rotation = {
		            x: 0,
		            y: 0
		        };
		        this.size = {
		            x: 1,
		            y: 1,
		            z: 1
		        };

		        //set up object
		        var geometry = new THREE.CubeGeometry(1, 1, 1);
		        var materials = new THREE.MeshFaceMaterial(materials);
		        var cube = new THREE.Mesh(geometry, materials);
		        cube.doubleSided = true;
		        scene.add(cube);

		        //set up camera
		        var camera = new THREE.PerspectiveCamera(45, this.width / this.height, 1, 5000);
		        camera.lookAt(cube.position);
		        camera.position.z = this.width / 2;
		        scene.add(camera);

		        //set up lights
		        var lightFront = new THREE.PointLight(0xffffff);
		        lightFront.position.set(0, 0, 1000);
		        lightFront.intensity = 0.6;
		        scene.add(lightFront);

		        var lightLeft = new THREE.PointLight(0xffffff);
		        lightLeft.position.set(1000, 0, 0);
		        lightLeft.intensity = 0.7;
		        scene.add(lightLeft);

		        var lightRight = new THREE.PointLight(0xffffff);
		        lightRight.position.set(-1000, 0, 0);
		        lightRight.intensity = 0.7;
		        scene.add(lightRight);

		        /**
		         * Render object
		         */
		        this.render = function() {
		            //update position
		            cube.position.x = this.position.x;
		            cube.position.y = this.position.y;
		            cube.position.z = this.position.z;

		            cube.rotation.y = this.rotation.y;
		            cube.rotation.z = this.rotation.z;

		            //upate size
		            cube.scale.x = this.size.x;
		            cube.scale.y = this.size.y;
		            cube.scale.z = this.size.z;

		            renderer.render(scene, camera);
		        };

		        /**
		         * Transform position for 3D scene
		         */
		        this.correct = function(x, y) {
		            return {
		                x: ((this.width / 2 - x) * -1) / 2,
		                y: (this.height / 2 - y) / 2
		            };
		        }

		        //print debug
		        this.printDebug();
		    };

		    var tryOn = null;
		    $(window).load(function() {
		        $('#start').hide();

		        var object = {
		            outside: {
		                left: '<?= $this->session->userdata('left'); ?>',
		                right: '<?= $this->session->userdata('right'); ?>',
		                front: '<?= $this->session->userdata('front'); ?>'
		            }
		        };

		        tryOn = new TryOnFace({
		            width: 640,
		            height: 480,
		            debug: true,
		            object: object,
		            statusHandler: function(status) {
		                switch (status) {
		                    case "STATUS_READY": {
		                        /* Ready! Show start button or something... */
		                        $('#start').show();
		                    };
		                    break;
		                case "STATUS_CAMERA_ERROR": {
		                    /* Handle camera error */
		                };
		                break;
		                case "STATUS_SEARCH": {
		                    /* Show some message while searching a face */
		                };
		                break;
		                case "STATUS_FOUND": {
		                    /* OK! */
		                }
		                }
		            }
		        });

		        $('#start').click(function() {
		            tryOn.start();
		        });
		    });
		</script>
		</body>

		</html>