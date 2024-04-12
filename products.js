function toggleProductDescription(description) {
    var productImage = event.target;
    var product = productImage.parentNode ;
    var productDescription = productImage.nextElementSibling;
  
    if (productImage.classList.contains('active')) {
      productImage.classList.remove('active');
      product.classList.remove('trans');
     
      setTimeout(function() {
        productImage.style.transform = 'translateX(0)';
        productDescription.style.transform = 'translateX(100%)';
      }, 0.4);
    } 
    else {
      productImage.classList.add('active');
      product.classList.add('trans');
      productDescription.innerHTML += '<p>' + description + ' <br><br> prix: 120DT' +'</p>';
      productDescription.style.display = 'block';
    
      setTimeout(function() {
        productDescription.style.opacity = 1;
        productImage.style.transform = 'translateX(-50px)';
        productDescription.style.transform = 'translate(-65px,-30px)';
      }, 0.4); 
    }
}

function changeIcon(element) {
  element.classList.toggle("far");
  element.classList.toggle("fa");
}

const myClassElements = document.querySelectorAll('.product');
document.addEventListener('click', function(event) {
  myClassElements.forEach(function(element) {
    // Check if the clicked element is the target element or one of its children
    if (event.target === element || element.contains(event.target)) {
      return;
    }

    // Remove the active class from the target element
    element.classList.remove('trans');
    const productImage = element.firstElementChild;
    const productDescription =element.lastElementChild;
    if (productImage) {
      productImage.classList.remove('active');

      setTimeout(function() {
        productImage.style.transform = 'translateX(0)';
        productDescription.style.transform = 'translateX(100%)';
      }, 0.4);
    }
  });
});


  
  
  
  
  
  
  