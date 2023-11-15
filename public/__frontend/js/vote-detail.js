let vote = function (e) {
  if ($(e).parent().find('input[type="radio"]').prop("checked")) {
    $(e).parent().find('input[type="radio"]').prop("checked", false);
  } else {
    $(e).parent().find('input[type="radio"]').click();
  }
  // $(e).addClass('success');
  $("form")
    .find('input[type="radio"]')
    .each(function (key, value) {
      if (value.checked) {
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container-success");
        if ($(value).val() === "0") {
          $(value).parent().find("button").eq(0).removeClass("success");
          $(value).parent().find("button").eq(1).addClass("success");
          img.addClass("border-red-500");
          number.addClass("border-red-500");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
        } else {
          $(value).parent().find("button").eq(0).addClass("success");
          $(value).parent().find("button").eq(1).removeClass("success");
          img.addClass("border-green-500");
          number.addClass("border-green-500");
        img.removeClass("border-red-500");
        number.removeClass("border-red-500");
        }
      } else if (
        !$(value).parent().find('input[type="radio"]').eq(0).prop("checked") &&
        !$(value).parent().find('input[type="radio"]').eq(1).prop("checked")
      ) {
        $(value).parent().find("button").removeClass("success");
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
        img.removeClass("border-red-500");
        number.removeClass("border-red-500");
      }
    });
};
let voteApprove = function (e) {
  if ($(e).parent().find('input[type="radio"]').eq(0).prop("checked")) {
    $(e).parent().find('input[type="radio"]').prop("checked", false);
    $($(e).data("sumref")).text("Abstain");
  } else {
    $(e).parent().find('input[type="radio"]').eq(0).click();
    $($(e).data("sumref")).text("Setuju");
  }
  // $(e).addClass('success');
  $("form")
    .find('input[type="radio"]')
    .each(function (key, value) {
      if (value.checked) {
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container-success");
        if ($(value).val() === "0") {
          $(value).parent().find("button").eq(0).removeClass("success");
          $(value).parent().find("button").eq(1).addClass("success");
          img.addClass("border-red-500");
          number.addClass("border-red-500");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
        } else {
          $(value).parent().find("button").eq(0).addClass("success");
          $(value).parent().find("button").eq(1).removeClass("success");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
          img.addClass("border-green-500");
          number.addClass("border-green-500");
        }
      } else if (
        !$(value).parent().find('input[type="radio"]').eq(0).prop("checked") &&
        !$(value).parent().find('input[type="radio"]').eq(1).prop("checked")
      ) {
        $(value).parent().find("button").removeClass("success");
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
        img.removeClass("border-red-500");
        number.removeClass("border-red-500");
      }
    });
};

let voteReject = function (e) {
  if ($(e).parent().find('input[type="radio"]').eq(1).prop("checked")) {
    $(e).parent().find('input[type="radio"]').prop("checked", false);
    $($(e).data("sumref")).text("Abstain");
  } else {
    $(e).parent().find('input[type="radio"]').eq(1).click();
    $($(e).data("sumref")).text("Tidak Setuju");
  }
  // $(e).addClass('success');
  $("form")
    .find('input[type="radio"]')
    .each(function (key, value) {
      if (value.checked) {
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container-success");
        if ($(value).val() === "0") {
          $(value).parent().find("button").eq(0).removeClass("success");
          $(value).parent().find("button").eq(1).addClass("success");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
          img.addClass("border-red-500");
          number.addClass("border-red-500");
        } else {
          $(value).parent().find("button").eq(0).addClass("success");
          $(value).parent().find("button").eq(1).removeClass("success");
        img.removeClass("border-red-500");
        number.removeClass("border-red-500");
          img.addClass("border-green-500");
          number.addClass("border-green-500");
        }
      } else if (
        !$(value).parent().find('input[type="radio"]').eq(0).prop("checked") &&
        !$(value).parent().find('input[type="radio"]').eq(1).prop("checked")
      ) {
        $(value).parent().find("button").removeClass("success");
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
        img.removeClass("border-red-500");
        number.removeClass("border-red-500");
      }
    });
};

let voteMulti = function (e, textVal) {
  let text = $(e).parent().find('input[type="text"]');
  console.log(text.val());
  if (text.val()) {
    text.val("");
  } else {
    text.val(textVal);
  }
  // $(e).addClass('success');
  $("form")
    .find('input[type="text"]')
    .each(function (key, value) {
      if (value.value) {
        $(value).parent().find("button").addClass("success");
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container-success");
        img.addClass("border-green-500");
        number.addClass("border-green-500");
      } else {
        $(value).parent().find("button").removeClass("success");
        let container = $(value).parent().parent().children().first();
        let img = $(value).parent().parent().find("img");
        let number = $(value)
          .parent()
          .parent()
          .parent()
          .children()
          .first()
          .children();
        container.removeClass();
        container.addClass("kandidat-container");
        img.removeClass("border-green-500");
        number.removeClass("border-green-500");
      }
    });
};

let submitForm = function(e) {
  $("#voteform").submit();
  $.modal.close();
};

let showModal = function(e) {
  $("#summary").modal({
    showClose: false
  });
}